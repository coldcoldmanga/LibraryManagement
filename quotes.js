//the quote array
const quotes = [
    { content: "The only way to do great work is to love what you do.", author: "Steve Jobs" },
    { content: "Life is what happens when you're busy making other plans.", author: "John Lennon" },
    { content: "The future belongs to those who believe in the beauty of their dreams.", author: "Eleanor Roosevelt" },
    { content: "Success is not final, failure is not fatal: it is the courage to continue that counts.", author: "Winston Churchill" },
    { content: "In the end, it's not the years in your life that count. It's the life in your years.", author: "Abraham Lincoln" },
    { content: "Be the change you wish to see in the world.", author: "Mahatma Gandhi" },
    { content: "To be yourself in a world that is constantly trying to make you something else is the greatest accomplishment.", author: "Ralph Waldo Emerson" },
    { content: "Two roads diverged in a wood, and I—I took the one less traveled by, And that has made all the difference.", author: "Robert Frost" },
    { content: "I have not failed. I've just found 10,000 ways that won't work.", author: "Thomas A. Edison" },
    { content: "The greatest glory in living lies not in never falling, but in rising every time we fall.", author: "Nelson Mandela" },
    { content: "The way to get started is to quit talking and begin doing.", author: "Walt Disney" },
    { content: "Your time is limited, don't waste it living someone else's life.", author: "Steve Jobs" },
    { content: "If life were predictable it would cease to be life, and be without flavor.", author: "Eleanor Roosevelt" },
    { content: "If you look at what you have in life, you'll always have more.", author: "Oprah Winfrey" },
    { content: "If you set your goals ridiculously high and it's a failure, you will fail above everyone else's success.", author: "James Cameron" },
    { content: "Life is what happens to you while you're busy making other plans.", author: "Allen Saunders" },
    { content: "Spread love everywhere you go. Let no one ever come to you without leaving happier.", author: "Mother Teresa" },
    { content: "When you reach the end of your rope, tie a knot in it and hang on.", author: "Franklin D. Roosevelt" },
    { content: "Always remember that you are absolutely unique. Just like everyone else.", author: "Margaret Mead" },
    { content: "Don't judge each day by the harvest you reap but by the seeds that you plant.", author: "Robert Louis Stevenson" },
    { content: "The future belongs to those who believe in the beauty of their dreams.", author: "Eleanor Roosevelt" },
    { content: "Tell me and I forget. Teach me and I remember. Involve me and I learn.", author: "Benjamin Franklin" },
    { content: "The best and most beautiful things in the world cannot be seen or even touched - they must be felt with the heart.", author: "Helen Keller" },
    { content: "It is during our darkest moments that we must focus to see the light.", author: "Aristotle" },
    { content: "Whoever is happy will make others happy too.", author: "Anne Frank" },
    { content: "Do not go where the path may lead, go instead where there is no path and leave a trail.", author: "Ralph Waldo Emerson" },
    { content: "You will face many defeats in life, but never let yourself be defeated.", author: "Maya Angelou" },
    { content: "The greatest glory in living lies not in never falling, but in rising every time we fall.", author: "Nelson Mandela" },
    { content: "In the end, it's not the years in your life that count. It's the life in your years.", author: "Abraham Lincoln" },
    { content: "Never let the fear of striking out keep you from playing the game.", author: "Babe Ruth" },
    { content: "Life is either a daring adventure or nothing at all.", author: "Helen Keller" },
    { content: "Many of life's failures are people who did not realize how close they were to success when they gave up.", author: "Thomas A. Edison" },
    { content: "You have brains in your head. You have feet in your shoes. You can steer yourself any direction you choose.", author: "Dr. Seuss" },
    { content: "If life were predictable it would cease to be life, and be without flavor.", author: "Eleanor Roosevelt" },
    { content: "In the end, it's not the years in your life that count. It's the life in your years.", author: "Abraham Lincoln" },
    { content: "Life is a succession of lessons which must be lived to be understood.", author: "Ralph Waldo Emerson" },
    { content: "You will face many defeats in life, but never let yourself be defeated.", author: "Maya Angelou" },
    { content: "Never let the fear of striking out keep you from playing the game.", author: "Babe Ruth" },
    { content: "Life is never fair, and perhaps it is a good thing for most of us that it is not.", author: "Oscar Wilde" },
    { content: "The only impossible journey is the one you never begin.", author: "Tony Robbins" },
    { content: "In this life we cannot do great things. We can only do small things with great love.", author: "Mother Teresa" },
    { content: "Only a life lived for others is a life worthwhile.", author: "Albert Einstein" },
    { content: "The purpose of our lives is to be happy.", author: "Dalai Lama" },
    { content: "You only live once, but if you do it right, once is enough.", author: "Mae West" },
    { content: "Live in the sunshine, swim the sea, drink the wild air.", author: "Ralph Waldo Emerson" },
    { content: "Go confidently in the direction of your dreams! Live the life you've imagined.", author: "Henry David Thoreau" },
    { content: "The greatest glory in living lies not in never falling, but in rising every time we fall.", author: "Nelson Mandela" },
    { content: "Life is really simple, but we insist on making it complicated.", author: "Confucius" },
    { content: "May you live all the days of your life.", author: "Jonathan Swift" },
    { content: "Life is ours to be spent, not to be saved.", author: "D. H. Lawrence" },
    { content: "Keep smiling, because life is a beautiful thing and there's so much to smile about.", author: "Marilyn Monroe" },
    { content: "Life is a long lesson in humility.", author: "James M. Barrie" },
    { content: "In three words I can sum up everything I've learned about life: it goes on.", author: "Robert Frost" },
    { content: "Love the life you live. Live the life you love.", author: "Bob Marley" },
    { content: "Life is either a daring adventure or nothing at all.", author: "Helen Keller" },
    { content: "You have brains in your head. You have feet in your shoes. You can steer yourself any direction you choose.", author: "Dr. Seuss" },
    { content: "Life is made of ever so many partings welded together.", author: "Charles Dickens" },
    { content: "Your time is limited, so don't waste it living someone else's life.", author: "Steve Jobs" },
    { content: "Life is trying things to see if they work.", author: "Ray Bradbury" },
    { content: "Many of life's failures are people who did not realize how close they were to success when they gave up.", author: "Thomas A. Edison" },
    { content: "Success is not final; failure is not fatal: It is the courage to continue that counts.", author: "Winston S. Churchill" },
    { content: "The secret of success is to do the common thing uncommonly well.", author: "John D. Rockefeller Jr." },
    { content: "I find that the harder I work, the more luck I seem to have.", author: "Thomas Jefferson" },
    { content: "The real test is not whether you avoid this failure, because you won't. It's whether you let it harden or shame you into inaction, or whether you learn from it; whether you choose to persevere.", author: "Barack Obama" },
    { content: "Don't be distracted by criticism. Remember--the only taste of success some people get is to take a bite out of you.", author: "Zig Ziglar" },
    { content: "I never dreamed about success, I worked for it.", author: "Estee Lauder" },
    { content: "Success seems to be connected with action. Successful people keep moving. They make mistakes but they don't quit.", author: "Conrad Hilton" },
    { content: "There are no secrets to success. It is the result of preparation, hard work, and learning from failure.", author: "Colin Powell" },
    { content: "The only place where success comes before work is in the dictionary.", author: "Vidal Sassoon" },
    { content: "I owe my success to having listened respectfully to the very best advice, and then going away and doing the exact opposite.", author: "G. K. Chesterton" },
    { content: "Would you like me to give you a formula for success? It's quite simple, really: Double your rate of failure. You are thinking of failure as the enemy of success. But it isn't at all. You can be discouraged by failure or you can learn from it, so go ahead and make mistakes. Make all you can. Because remember that's where you will find success.", author: "Thomas J. Watson" },
    { content: "People who succeed have momentum. The more they succeed, the more they want to succeed, and the more they find a way to succeed. Similarly, when someone is failing, the tendency is to get on a downward spiral that can even become a self-fulfilling prophecy.", author: "Tony Robbins" },
    { content: "Don't let the fear of losing be greater than the excitement of winning.", author: "Robert Kiyosaki" },
    { content: "If you really look closely, most overnight successes took a long time.", author: "Steve Jobs" },
    { content: "The real test is not whether you avoid this failure, because you won't. It's whether you let it harden or shame you into inaction, or whether you learn from it; whether you choose to persevere.", author: "Barack Obama" },
    { content: "The successful warrior is the average man, with laser-like focus.", author: "Bruce Lee" },
    { content: "Opportunities don't happen. You create them.", author: "Chris Grosser" },
    { content: "Success is not in what you have, but who you are.", author: "Bo Bennett" },
    { content: "Believe you can and you're halfway there.", author: "Theodore Roosevelt" },
    { content: "Success is walking from failure to failure with no loss of enthusiasm.", author: "Winston Churchill" },
    { content: "I have not failed. I've just found 10,000 ways that won't work.", author: "Thomas A. Edison" },
    { content: "A successful man is one who can lay a firm foundation with the bricks others have thrown at him.", author: "David Brinkley" },
    { content: "No one can make you feel inferior without your consent.", author: "Eleanor Roosevelt" },
    { content: "The whole secret of a successful life is to find out what is one's destiny to do, and then do it.", author: "Henry Ford" },
    { content: "If you're going through hell, keep going.", author: "Winston Churchill" },
    { content: "What seems to us as bitter trials are often blessings in disguise.", author: "Oscar Wilde" },
    { content: "The distance between insanity and genius is measured only by success.", author: "Bruce Feirstein" },
    { content: "Don't be afraid to give up the good to go for the great.", author: "John D. Rockefeller" },
    { content: "Happiness is a butterfly, which when pursued, is always beyond your grasp, but which, if you will sit down quietly, may alight upon you.", author: "Nathaniel Hawthorne" },
    { content: "If you can't explain it simply, you don't understand it well enough.", author: "Albert Einstein" },
    { content: "Life is not measured by the number of breaths we take, but by the moments that take our breath away.", author: "Maya Angelou" },
    { content: "Strive not to be a success, but rather to be of value.", author: "Albert Einstein" },
    { content: "The most difficult thing is the decision to act, the rest is merely tenacity.", author: "Amelia Earhart" },
    { content: "Every strike brings me closer to the next home run.", author: "Babe Ruth" },
    { content: "Twenty years from now you will be more disappointed by the things that you didn't do than by the ones you did do.", author: "Mark Twain" },
    { content: "The most common way people give up their power is by thinking they don't have any.", author: "Alice Walker" },
    { content: "The mind is everything. What you think you become.", author: "Buddha" },
    { content: "The best time to plant a tree was 20 years ago. The second best time is now.", author: "Chinese Proverb" },
    { content: "An unexamined life is not worth living.", author: "Socrates" },
    { content: "Your time is limited, don't waste it living someone else's life.", author: "Steve Jobs" },
    { content: "Winning isn't everything, but wanting to win is.", author: "Vince Lombardi" },
    { content: "I am not a product of my circumstances. I am a product of my decisions.", author: "Stephen Covey" },
    { content: "Every child is an artist. The problem is how to remain an artist once he grows up.", author: "Pablo Picasso" }
];

const quoteText = document.querySelector(".quote"),
authorName = document.querySelector(".author .name"),
quoteBtn = document.querySelector("button");

// Random quote function
function randomQuote() {
    quoteBtn.classList.add("loading");
    quoteBtn.innerText = "Loading...";

    // Simulate a loading time
    setTimeout(() => {
        const randomIndex = Math.floor(Math.random() * quotes.length);
        const { content, author } = quotes[randomIndex];

        quoteText.innerText = content;
        authorName.innerText = author;
        quoteBtn.innerText = "New Quote";
        quoteBtn.classList.remove("loading");
    }, 500);
}

quoteBtn.addEventListener("click", randomQuote);

// Initial quote on page load
randomQuote();
