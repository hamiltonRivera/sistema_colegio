<div>
    <div>

        <input wire:model="search" type="search" placeholder="Search posts by title...">



        <h1>Search Results:</h1>



        <ul>

            @foreach($users as $user)

                <li>{{ $user->name }}</li>
                <li>{{ $user->email }}</li>

            @endforeach

        </ul>

    </div>
</div>
