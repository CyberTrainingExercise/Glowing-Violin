const commentsData = {
    post1: [
        { username: 'Poe T. Ato', text: 'Great post, Bear! 📉📉📉😮', timestamp: '1 hour ago' },
        // Add more comments here
    ],
    post2: [
        // Comments for post2
    ]
    // Add more posts and comments here
};

function generateComment(comment) {
    return `
        <div class="comment">
            <p class="username">${comment.username}</p>
            <p>${comment.content}</p>
        </div>
    `;
}

postId = 1;
const comments = data[`post${postId}`];

if (comments) {
    comments.forEach(comment => {
        console.log(comment);
    });
}

console.log("joe");
                