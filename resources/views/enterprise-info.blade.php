<form action="{{ route('enterprise.info.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="logo">
    <input type="text" name="slogan" placeholder="Slogan">
    <input type="text" name="industrie" placeholder="Industry">
    <textarea name="discreption" placeholder="Discription"></textarea>
    <button type="submit">Submit</button>
</form>