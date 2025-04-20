// Back to top button
$(window).scroll(function () {
    if ($(this).scrollTop() > 300) {
        $('.back-to-top').fadeIn('slow');
    } else {
        $('.back-to-top').fadeOut('slow');
    }
});
$('.back-to-top').click(function () {
    $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
    return false;
});

// Dropdown on mouse hover
const $dropdown = $(".dropdown");
const $dropdownToggle = $(".dropdown-toggle");
const $dropdownMenu = $(".dropdown-menu");
const showClass = "show";

$(window).on("load resize", function() {
    if (this.matchMedia("(min-width: 992px)").matches) {
        $dropdown.hover(
            function() {
                const $this = $(this);
                $this.addClass(showClass);
                $this.find($dropdownToggle).attr("aria-expanded", "true");
                $this.find($dropdownMenu).addClass(showClass);
            },
            function() {
                const $this = $(this);
                $this.removeClass(showClass);
                $this.find($dropdownToggle).attr("aria-expanded", "false");
                $this.find($dropdownMenu).removeClass(showClass);
            }
        );
    } else {
        $dropdown.off("mouseenter mouseleave");
    }
});

// Date and time picker
$('.date').datetimepicker({
    format: 'L'
});
$('.time').datetimepicker({
    format: 'LT'
});

// Testimonials carousel
$(".testimonial-carousel").owlCarousel({
    autoplay: true,
    smartSpeed: 1000,
    margin: 25,
    dots: false,
    loop: true,
    nav : true,
    navText : [
        '<i class="fa fa-angle-left"></i>',
        '<i class="fa fa-angle-right"></i>'
    ],
    responsive: {
        0:{
            items:1
        },
        576:{
            items:1
        },
        768:{
            items:2
        },
        992:{
            items:3
        }
    }
});

// Publications functionality
document.addEventListener('DOMContentLoaded', function() {
    const postForm = document.getElementById('postForm');
    const mediaContainer = document.getElementById('mediaContainer');
    const mediaPreview = document.getElementById('mediaPreview');
    const mediaInput = document.getElementById('media');
    let currentPostType = 'text';

    // Handle post type selection
    document.querySelectorAll('[data-type]').forEach(button => {
        button.addEventListener('click', function() {
            currentPostType = this.dataset.type;
            mediaContainer.style.display = currentPostType === 'text' ? 'none' : 'block';
            mediaPreview.innerHTML = '';
        });
    });

    // Handle media preview
    mediaInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = function(e) {
            mediaPreview.innerHTML = currentPostType === 'video' 
                ? `<video src="${e.target.result}" controls class="media-content"></video>`
                : `<img src="${e.target.result}" alt="Preview" class="media-content">`;
        };
        reader.readAsDataURL(file);
    });

    // Handle form submission
    postForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const content = document.getElementById('content').value;
        const mediaFile = document.getElementById('media').files[0];
        
        if (!content.trim()) {
            alert('Please enter some content');
            return;
        }

        const formData = new FormData();
        formData.append('content', content);
        formData.append('type_pub', currentPostType);
        if (mediaFile) {
            formData.append('media', mediaFile);
        }

        try {
            const response = await fetch('/publication/new', {
                method: 'POST',
                body: formData
            });

            const data = await response.json();
            if (response.ok) {
                postForm.reset();
                mediaPreview.innerHTML = '';
                mediaContainer.style.display = 'none';
                document.querySelector('[data-type="text"]').click();
                await loadPosts();
            } else {
                alert(data.error || 'Failed to create post');
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Failed to create post');
        }
    });

    // Initial load of posts
    loadPosts();
});

async function loadPosts() {
    try {
        const response = await fetch('/publication/list');
        if (!response.ok) {
            throw new Error('Failed to load posts');
        }
        
        const posts = await response.json();
        const postsContainer = document.getElementById('posts-container');
        postsContainer.innerHTML = '';
        
        posts.forEach(post => {
            const postElement = createPostElement(post);
            postsContainer.appendChild(postElement);
        });
    } catch (error) {
        console.error('Error loading posts:', error);
    }
}

function createPostElement(post) {
    const postDiv = document.createElement('div');
    postDiv.className = 'bg-white p-5 rounded shadow mb-4';
    
    let contentHtml = '';
    if (post.type_pub === 'text') {
        contentHtml = `<p class="mb-4">${post.contenu}</p>`;
    } else {
        contentHtml = `
            <div class="media-container">
                ${post.type_pub === 'video' 
                    ? `<video src="${post.contenu}" controls class="media-content"></video>`
                    : `<img src="${post.contenu}" alt="" class="media-content">`
                }
            </div>`;
    }

    postDiv.innerHTML = `
        <div class="d-flex align-items-center mb-4">
            <img src="${post.user.pdp}" alt="${post.user.prenom}" class="user-avatar">
            <div class="ml-3">
                <h6 class="mb-1">${post.user.prenom} ${post.user.nom}</h6>
                <small class="text-muted">${new Date(post.date).toLocaleString()}</small>
            </div>
        </div>
        
        ${contentHtml}
        
        <div class="post-actions">
            <button onclick="toggleReaction('${post.id}')" class="btn btn-link" data-post-id="${post.id}">
                <i class="far fa-heart"></i>
                <span class="likes-count">${post.likes ? post.likes.length : 0}</span>
            </button>
            <button onclick="toggleComments('${post.id}')" class="btn btn-link">
                <i class="far fa-comment"></i>
                <span>${post.commentaires ? post.commentaires.length : 0}</span>
            </button>
        </div>
        
        <div id="comments-${post.id}" class="comments-section" style="display: none;">
            <div class="comments-container">
                ${post.commentaires ? post.commentaires.map(comment => `
                    <div class="comment">
                        <div class="d-flex align-items-start">
                            <img src="${comment.user.pdp}" alt="${comment.user.prenom}" class="user-avatar">
                            <div class="ml-3">
                                <h6 class="mb-1">${comment.user.prenom} ${comment.user.nom}</h6>
                                <p class="mb-1">${comment.contenu}</p>
                                <small class="text-muted">${new Date(comment.date).toLocaleString()}</small>
                            </div>
                        </div>
                    </div>
                `).join('') : ''}
            </div>
            <form onsubmit="submitComment(event, '${post.id}')" class="mt-3">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Write a comment...">
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </form>
        </div>
    `;
    
    return postDiv;
}

function toggleComments(postId) {
    const commentsSection = document.getElementById(`comments-${postId}`);
    commentsSection.style.display = commentsSection.style.display === 'none' ? 'block' : 'none';
}

function submitComment(event, postId) {
    event.preventDefault();
    const form = event.target;
    const input = form.querySelector('input');
    const content = input.value.trim();
    
    if (!content) return;

    fetch(`/publication/${postId}/comment`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ content: content })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const commentsContainer = document.querySelector(`#comments-${postId} .comments-container`);
            const commentHtml = `
                <div class="comment">
                    <div class="d-flex align-items-start">
                        <img src="${data.comment.user.pdp}" alt="${data.comment.user.prenom}" class="user-avatar">
                        <div class="ml-3">
                            <h6 class="mb-1">${data.comment.user.prenom} ${data.comment.user.nom}</h6>
                            <p class="mb-1">${content}</p>
                            <small class="text-muted">${new Date().toLocaleString()}</small>
                        </div>
                    </div>
                </div>
            `;
            commentsContainer.insertAdjacentHTML('beforeend', commentHtml);
            input.value = '';
            
            const commentButton = form.closest('.post').querySelector('button:nth-child(2) span');
            const currentCount = parseInt(commentButton.textContent);
            commentButton.textContent = currentCount + 1;
        }
    })
    .catch(error => console.error('Error:', error));
}

function toggleReaction(postId) {
    fetch(`/publication/${postId}/reaction`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const reactionButton = document.querySelector(`button[data-post-id="${postId}"]`);
            const likesCount = reactionButton.querySelector('.likes-count');
            const icon = reactionButton.querySelector('i');
            
            likesCount.textContent = data.likesCount;
            icon.classList.toggle('fas');
            icon.classList.toggle('far');
        }
    })
    .catch(error => console.error('Error:', error));
} 