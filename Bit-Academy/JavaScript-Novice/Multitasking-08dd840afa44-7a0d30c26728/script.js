const blogPosts = {
    posts: [
        {
            titel: "Het geheim van Google",
            tags: ["Google", "Business", "Artificial Intelligence"],
            auteurs: ["Bob", "Alice"],
        },
        {
            titel: "IT bepaalt de toekomst",
            tags: ["Filosofie", "Innovatie"],
            auteurs: ["Alice"],
        },
        {
            titel: "Je zal deze 10 redenen dat ik een hekel heb aan clickbait en ironie nooit geloven!!!",
            tags: ["Cultuur", "Opinie"],
            auteurs: ["Bob"],
        },
    ],
};

/**
 * Simuleer het ophalen van data vanuit een API.
 * @returns een promise voor het getPosts object dat hierboven staat.
 */
async function getPosts() {
    return new Promise((resolve) => {
        setTimeout(() => {
            resolve(blogPosts);
        }, 2000);
    });
}


function addDataToTable(post, index) {
    document.getElementById(`titel${index}`).textContent = post.titel;
    document.getElementById(`auteurs${index}`).textContent = post.auteurs;
    document.getElementById(`tags${index}`).textContent = post.tags;
}

async function ShowData() {
    const blogs = await getPosts();
    blogs.posts.forEach((post, index) => {
        addDataToTable(post, index);
    });
}

ShowData();