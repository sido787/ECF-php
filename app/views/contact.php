<h1>Contact page</h1>

<form id="contactForm">
    <input type="text" name="name" placeholder="Name"><br>
    <input type="email" name="email" placeholder="Email"><br>
    <textarea name="message"></textarea><br>
    <button>Send</button>
</form>

<div id="result"></div>

<script>
document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();

    fetch('/?action=contact', {
        method: 'POST',
        body: new FormData(this)
    })
    .then(r => r.text())
    .then(res => {
        document.getElementById('result').innerText = res;
    });
});
</script>
