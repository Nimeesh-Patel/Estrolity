document.getElementById('newQuote').addEventListener('click', function() {
    const quotes = [
        "The best time to plant a tree was 20 years ago. The second best time is now.",
        "Everything you’ve ever wanted is on the other side of fear.",
        "Success is not final, failure is not fatal: It is the courage to continue that counts.",
        "It’s not whether you get knocked down, it’s whether you get up.",
        "Believe you can and you’re halfway there."
    ];

    const quote = quotes[Math.floor(Math.random() * quotes.length)];
    document.getElementById('quote').innerText = quote;
});

