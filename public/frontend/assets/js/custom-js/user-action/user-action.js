document.body.addEventListener('click', function(event) {
    if (event.target.classList.contains('inResultSendMessageBtn')) {
        let interestId = event.target.getAttribute('data-id');
        
        if (interestId) {
            console.log("User ID: " + interestId);
            setTimeout(() => alert("User ID: " + interestId), 500);
        } else {
            console.error("Error: data-id is missing");
        }
    }
});
