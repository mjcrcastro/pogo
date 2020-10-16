<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use \App\User;
use \App\UserFriends;

class UserController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //lists all available friends, except:
        // --- those already befriended,
        // --- the current user
        // --- those users not having a faulty_count of less than 10
        //Query below wont work on InfinityFree MySQL
        /* TODO find a way to have the query work for any server
          $user = User::orderByDesc('updated_at')
          ->orderByDesc('id')
          ->whereNotIn('users.id', function($query) {
          $query->select('friend_id')->from('user_friends')
          ->where('user_friends.user_id', '=', Auth::id())
          ->union(DB::table('user_friends')
          ->select('user_id')
          ->where('user_friends.friend_id', '=', Auth::id())
          );
          }) //
          ->where('users.id','<>',Auth::id())
          ->where('faulty_count', '<', 10)->first();
          TODO */
        //the query below was creates because its the only that works on infinity free 
        $users = DB::select(
                        DB::raw('select * from `users` where `users`.`id` not in '
                                . '(select `friend_id` from `user_friends` where `user_friends`.`user_id` = ' . Auth::id() . ' '
                                . 'union '
                                . 'select `user_id` from `user_friends` where `user_friends`.`friend_id` = ' . Auth::id() . ') '
                                . 'and `users`.`id` <> ' . Auth::id() . ' and `faulty_count` < 10 '
                                . 'order by `updated_at` desc, `users`.`id` desc limit 1')
        );
        if ($users) { //the query returns an array of users, the view uses a user object, need to pass just the user
            $user = (object) $users[0];
        } else {
            $user = null;
        }
        $total_friends = UserFriends::where('user_id','=',Auth::id())->count(); //counts the number of codes this user has befriended
        $total_codes = User::count();
        return view('users.index', compact('user', 'total_friends', 'total_codes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $user_id = Auth::Id(); //retrieve current user Id
        $userFriend = array('user_id' => $user_id, 'friend_id' => $id);
        //Refresh the current user data, so it shows higher in the list of codes
        $this->refreshCurUser();
        //Updates invalid codes, friends added, and user edits
        if ($request->has('friend_added')) { // friend code successfuly added
            $createdUserFriend = UserFriends::create($userFriend); //save as befriended, so it wont show again
            return redirect()->route('users.index');
        } else if ($request->has('friend_faulty')) { //friend code is faulty
            $user = User::find($id);
            $user->faulty_count = $user->faulty_count + 1;
            $user->update();
            $createdUserFriend = UserFriends::create($userFriend); //save as befriended so it wont show again
            return redirect()->route('users.index');
        } else if ($request->has('user_update')) { //update current user
            $input = $request->all();
            $this->validate($request, User::$rules);
            $user = User::find($id);
            $user->update($input);
            //and return to the index
            return redirect()->route('users.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

    private function refreshCurUser() {
        $cur_user = User::find(Auth::id());
        $cur_user->touch();
        $cur_user->update();
    }

}
