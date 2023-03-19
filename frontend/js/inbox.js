
// const messages = [
//    {
//         id: 1,
//         sender: 'john@example.com',
//         subject: 'Hello',
//         body: 'How are you doing?',
//         date: '2023-03-17T10:30:00Z'
//     },
//     {
//         id: 2,
//         sender: 'jane@example.com',
//         subject: 'Meeting',
//         body: 'Can we meet at 2pm today?',
//         date: '2023-03-18T14:00:00Z'
//     }
// ];

// const inboxDiv = document.getElementById('inbox');

//     messages.forEach(message => {
//         const container = document.createElement('div');
//         container.className = 'container';

//         const senderDiv = document.createElement('div');
//         senderDiv.textContent = `From: ${message.sender}`;

//         const subjectDiv = document.createElement('div');
//         subjectDiv.textContent = `Subject: ${message.subject}`;

//         const bodyDiv = document.createElement('div');
//         bodyDiv.textContent = message.body;

//         const dateDiv = document.createElement('div');
//         dateDiv.textContent = new Date(message.date).toLocaleString();

//         container.appendChild(senderDiv);
//         container.appendChild(subjectDiv);
//         container.appendChild(bodyDiv);
//         container.appendChild(dateDiv);

//         inboxDiv.appendChild(container);
// });
const messages = [
        {
          id: 1,
          from: 'john@example.com',
          message_content: 'How are you doing?',
          date: '2023-03-17T10:30:00Z'
        },
        {
          id: 2,
          from: 'jane@example.com',
          message_content: 'Can we meet at 2pm today?',
          date: '2023-03-18T14:00:00Z'
        }
      ];

      const inboxDiv = document.getElementById('inbox');

      messages.forEach(message => {
        const container = document.createElement('div');
        container.className = 'container';

        const fromDiv = document.createElement('div');
        fromDiv.textContent = `From: ${message.from}`;

        const messageDiv = document.createElement('div');
        messageDiv.textContent = message.message_content;

        const dateDiv = document.createElement('div');
        dateDiv.textContent = new Date(message.date).toLocaleString();

        const replyButton = document.createElement('button');
        replyButton.textContent = 'Reply';
        replyButton.addEventListener('click', () => showReplyForm(container, message.from));

        const replyForm = createReplyForm(message.from);
        replyForm.style.display = 'none';

        container.appendChild(fromDiv);
        container.appendChild(messageDiv);
        container.appendChild(dateDiv);
        container.appendChild(replyButton);
        container.appendChild(replyForm);

        inboxDiv.appendChild(container);
      });

      function showReplyForm(container, to) {
        const replyForm = container.querySelector('.reply-form');
        const toInput = replyForm.querySelector('input[name="to"]');
        toInput.value = to;
        replyForm.style.display = 'block';
      }

function createReplyForm(to) {
  const form = document.createElement('form');
  form.className = 'reply-form';

  const toInput = document.createElement('input');
  toInput.type = 'email';
  toInput.name = 'to';
  toInput.required = true;
  toInput.value = to;
  toInput.readOnly = true;

  const messageLabel = document.createElement('label');
  messageLabel.textContent = 'Message: ';
  const messageTextarea = document.createElement('textarea');
  messageTextarea.name = 'message';
  messageTextarea.required = true;

  const sendButton = document.createElement('button');
  sendButton.type = 'submit';
  sendButton.textContent = 'Send';

  form.appendChild(toInput);
  form.appendChild(messageLabel);
  form.appendChild(messageTextarea);
  form.appendChild(sendButton);

  form.addEventListener('submit', (event) => {
    event.preventDefault();
    const formData = new FormData(event.target);
    const to = formData.get('to');
    const message = formData.get('message');
    console.log(`Sending reply to ${to}: ${message}`);
    form.reset();
    form.style.display = 'none';
  });

  return form;
}
