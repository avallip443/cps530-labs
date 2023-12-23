//Problem 1
function formValidator() {
    const nameEl = document.getElementById('name').value;
    const emailEl = document.getElementById('email').value;
    const phoneEl = document.getElementById('phone-number').value;

    const nameRegex = /^[a-zA-Z ]+$/;
    const emailRegex = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,63}$/;
    const phoneRegex = /^\(\d{3}\)\d{3}-\d{4}$/;

    if (!nameEl.match(nameRegex)) {
        alert('Your name can only have letters!');
        return;
    }

    if (!emailEl.match(emailRegex)) {
        alert('Please enter a valid email!')
    }

    if (!phoneEl.match(phoneRegex)) {
        alert('Please use form (555)555-5555!');
    } 
    // phoneNumber.replace(regex, '$1-$2-$3')
    
    const newPhone = phoneEl.replace(/\D/g, '').replace(/(\d{3})(\d{3})(\d{4})/, '$1-$2-$3');

    document.getElementById('largeName').textContent = `Name: ${nameEl}`;
    document.getElementById('largeEmail').textContent = `Email: ${emailEl}`;
    document.getElementById('largePhone').textContent = `Phone: ${newPhone}`;
    document.getElementById('display-info').style.display = "block";
}

// Problem 2
function characterCounter() {
    const textAreaEl = document.getElementById('textarea');
    const totalCountEl = document.getElementById('total-counter');
    const totalLettersEl = document.getElementById('letter-counter');

    textAreaEl.addEventListener('input', () => {
        updateCounter();
        updateLetterCounter();
    });

    updateLetterCounter();
    updateCounter();

    function updateCounter() {
        totalCountEl.innerText = textAreaEl.value.length;
    }

    function updateLetterCounter() {
        const letterRegex = /[A-Za-z]/g;
        const matches = textAreaEl.value.match(letterRegex);
        totalLettersEl.innerText = matches ? matches.length : 0;
    }
}

characterCounter();

// Problem 3
function createBookmarkList() {
    const bookmarks = [
        { name: "Coolmath Games", url: "https://www.coolmathgames.com/" },
        { name: "Wolfram Alpha", url: "https://www.wolframalpha.com/" },
        { name: "Totally safe website :))", url: "http://insecure-website-example.com" },
    ];

    const bookmarkListEl = document.getElementById("bookmark-list");

    bookmarks.forEach(bookmark => {
        const padlockIcon = bookmark.url.startsWith("https://")
            ? '<span class="secure"><img src="/lab04/resources/locked-padlock.png" alt="locked padlock"></span>'
            : '<span class="unsecure"><img src="/lab04/resources/unlock-padlock.png" alt="unlcoked padlock"></span>';

        const bookmarkEL = document.createElement("div");
        bookmarkEL.innerHTML = `${padlockIcon} <a href="${bookmark.url}" target="_blank">${bookmark.name}<br>${bookmark.url}<br><br></a>`;
        bookmarkListEl.appendChild(bookmarkEL);
    }); 
}

// Call the function to create and display bookmarks
createBookmarkList();