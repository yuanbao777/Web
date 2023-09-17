document.addEventListener('DOMContentLoaded', function() {
  const form = document.querySelector('form');

  form.addEventListener('submit', function(event) {
      event.preventDefault();

      // Form validation example
      const title = document.querySelector('input[name="Title"]').value;
      const content = document.querySelector('textarea[name="Contents"]').value;
      
      if(!title || !content) {
          alert('Title and content cannot be empty!');
          return;
      }

      
      form.submit();
  });
});

