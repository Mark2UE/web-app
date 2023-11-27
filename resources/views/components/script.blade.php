<script>
    const takenUsers = JSON.parse(@json($takenUsers));

    function validateUser() {
        const userInput = document.getElementById('name_type');
        const submitButton = document.getElementById('loading-btn1');
        const errorMessage = document.getElementById('message');

        const enteredUsers = userInput.value.trim();

        if (!enteredUsers) {
            document.getElementById('message').style.color = 'red';
            errorMessage.textContent = 'Please enter an Username.';
            submitButton.disabled = true;
        } else if (enteredUsers.length > 8) {
            document.getElementById('message').style.color = 'red';
            errorMessage.textContent = 'Max Lenght is 8.';
            submitButton.disabled = true;
        } else if (takenUsers.includes(enteredUsers)) {
            document.getElementById('message').style.color = 'red';
            errorMessage.textContent = 'Username is already taken.';
            submitButton.disabled = true;
        } else {
            errorMessage.textContent = '';
            submitButton.disabled = false;
        }

    }


    const takenEmails = JSON.parse(@json($takenEmails));

    function validateEmail() {
        const emailInput = document.getElementById('email_type');
        const submitButton = document.getElementById('loading-btn1');
        const errorMessage = document.getElementById('message');

        const enteredEmail = emailInput.value.trim();

        if (!enteredEmail) {
            document.getElementById('message').style.color = 'red';
            errorMessage.textContent = 'Please enter an email.';
            submitButton.disabled = true;
        } else if (!isValidEmail(enteredEmail)) {

            document.getElementById('message').style.color = 'red';
            errorMessage.textContent = 'Invalid email format.';
            submitButton.disabled = true;
        } else if (takenEmails.includes(enteredEmail)) {
            document.getElementById('message').style.color = 'red';
            errorMessage.textContent = 'Email is already taken.';
            submitButton.disabled = true;
        } else {
            errorMessage.textContent = '';
            submitButton.disabled = false;
        }
    }

    function isValidEmail(email) {
        // Simple email format validation
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
</script>
