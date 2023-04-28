const postContainer = document.getElementById('post-container');
const postForm = document.querySelector('.post-form form');
const chatbox = document.getElementById('chatbox');

function createPostElement(author, content, date) {
  const postElement = document.createElement('div');
  postElement.classList.add('post');

  const authorElement = document.createElement('div');
  authorElement.classList.add('post-author');
  postElement.appendChild(authorElement);

  const contentElement = document.createElement('div');
  contentElement.classList.add('post-content');
  postElement.appendChild(contentElement);

  const h2Element = document.createElement('h2');
  h2Element.textContent = author;
  contentElement.appendChild(h2Element);

  const pElement = document.createElement('p');
  pElement.textContent = content;
  contentElement.appendChild(pElement);

  const metaElement = document.createElement('div');
  metaElement.classList.add('post-meta');
  metaElement.textContent = date.toLocaleString();
  contentElement.appendChild(metaElement);

  return postElement;
}


function displayPost(postElement) {
  chatbox.appendChild(postElement);
}


postForm.addEventListener('submit', (event) => {
  event.preventDefault();

  const author = document.getElementById('post-author').value;
  const content = document.getElementById('post-content').value;
  const date = new Date();

  const postElement = createPostElement(author, content, date);
  displayPost(postElement);

  postForm.reset();
});
