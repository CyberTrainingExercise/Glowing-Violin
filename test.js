import fetch from 'node-fetch'
globalThis.fetch = fetch

fetch('commentfetch.php')
    .then(response => response.json());
console.log(response);
                