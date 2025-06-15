$(document).ready(function () {
  // Topic → Subtopic AJAX handler
  $('#topic').on('change', function () {
    var topicId = $(this).val();
    $('#sub_topic').html('<option>Loading...</option>');

    if (topicId) {
      $.ajax({
        url: window.subtopicsByTopicUrl,
        type: 'GET',
        data: { topic_id: topicId },
        success: function (data) {
          let options = '<option value="">-- Select Subtopic --</option>';
          data.forEach(function (subtopic) {
            options += `<option value="${subtopic.id}">${subtopic.name}</option>`;
          });
          $('#sub_topic').html(options);
        },
        error: function () {
          $('#sub_topic').html('<option value="">Error loading subtopics</option>');
        }
      });
    } else {
      $('#sub_topic').html('<option value="">-- Select Subtopic --</option>');
    }
  });

  // Add more URL fields dynamically
  $(document).on('click', '.add-url', function () {
    const urlInput = `
      <div class="input-group mb-2">
        <input type="url" name="reference_urls[]" class="form-control" placeholder="https://example.com">
        <div class="input-group-append">
          <button type="button" class="btn btn-outline-danger remove-url">
            <i class="fas fa-trash"></i>
          </button>
        </div>
      </div>`;
    $('#url-fields').append(urlInput);
  });

  // Remove a URL input
  $(document).on('click', '.remove-url', function () {
    $(this).closest('.input-group').remove();
  });
});