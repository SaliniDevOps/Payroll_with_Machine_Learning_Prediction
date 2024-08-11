document.getElementById('question-form').addEventListener('submit', function(event) {
    event.preventDefault();
    const question = document.getElementById('question').value;

    fetch('generate_response.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ question: question })
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById('response').innerText = data;
    })
    .catch(error => console.error('Error:', error));
});
