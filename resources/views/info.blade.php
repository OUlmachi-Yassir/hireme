<!-- info.blade.php -->
<form method="POST" action="{{ route('profile.save') }}">
    @csrf

    <label for="profile_picture">Profile Picture:</label>
    <input type="file" id="profile_picture" name="profile_picture">
    <br><br>

    <label for="industry">Industry:</label>
    <input type="text" id="industry" name="industry"><br><br>

    <label for="address">Address:</label>
    <input type="text" id="address" name="address"><br><br>

    <label for="contact_information">Contact Information:</label>
    <input type="text" id="contact_information" name="contact_information"><br><br>
    <label for="about_me">About-me:</label>
    <input type="text" id="about_me" name="about_me"><br><br>
    <button type="submit">Save Profile</button>
</form>


