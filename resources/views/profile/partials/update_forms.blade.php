<form method="POST" action="{{ route('user.update', $user->id) }}">
    @csrf
    @method('PUT')

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="{{ $user->name }}"><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="{{ $user->email }}"><br><br>

    <button type="submit">Update User</button>
</form>











