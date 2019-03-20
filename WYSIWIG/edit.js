class PreviewNews
{
    static previewNews()
    {
        document.getElementById('event').addEventListener('click', function () {
            window.location.reload();
        });

        document.getElementById('testText').innerHTML = document.getElementById('mytextarea').value;
    }
}

PreviewNews.previewNews();

