<form action="{{ route('pdf.upload') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="title" placeholder="Título del PDF">
    <input type="file" name="pdf_file">
    <button type="submit">Subir PDF</button>
</form>
