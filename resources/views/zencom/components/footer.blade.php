</body>
<script src="{{ asset('bootstrap-5.3.2/dist/js/bootstrap.bundle.js') }}"></script>

</html>

<script>
    const sidebar1 = document.querySelector('.sidebar-inside');
    const toggleSidebar1 = document.querySelector('#toggle-sidebar-inside');

    toggleSidebar1.addEventListener('click', () => {
        sidebar1.classList.toggle('active');
    });


    document.getElementById('toggle-sidebar-inside').addEventListener('click', () => {
        const sidebar1 = document.querySelector('.sidebar-inside');
        sidebar1.classList.toggle('hidden');
    });
</script>
<script>
    const sidebar = document.querySelector('.sidebar');
    const toggleSidebar = document.querySelector('#toggle-sidebar');

    toggleSidebar.addEventListener('click', () => {
        sidebar.classList.toggle('active');
    });


    document.getElementById('toggle-sidebar').addEventListener('click', () => {
        const sidebar = document.querySelector('.sidebar');
        sidebar.classList.toggle('hidden');
    });
</script>

<script>
    function submitForm() {
        // Display the spinner
        document.getElementById('loading-btn').querySelector('.spinner-border').classList.remove('d-none');

        // Disable the button to prevent multiple submissions
        document.getElementById('loading-btn').disabled = true;

        // Submit the form
        document.getElementById('myForm').submit();
    }
</script>


<script>
    function submitForm1() {
        // Display the spinner
        document.getElementById('loading-btn1').querySelector('.spinner-border').classList.remove('d-none');

        // Disable the button to prevent multiple submissions
        document.getElementById('loading-btn1').disabled = true;

        // Submit the form
        document.getElementById('myForm1').submit();
    }
</script>

<script>
    (function() {
        var words = ["Immortals", "Fierce",
            "Infinite", "Legendary",
            "Zenith", "Valorant"
        ];
        var i = 0;
        var j = 0;
        var currentWord = '';
        var isDeleting = false;

        function type() {
            var speed = 200; // typing speed in milliseconds

            if (j < words[i].length && !isDeleting) {
                currentWord += words[i][j];
                $('#delivery').text(currentWord);
                j++;
            } else if (j > 0 && isDeleting) {
                currentWord = currentWord.slice(0, -1);
                $('#delivery').text(currentWord);
                j--;
            } else {
                isDeleting = !isDeleting;
                if (isDeleting) {
                    speed = 500; // pause before starting to type next word when deleting
                }
                i = (i + 1) % words.length;
            }

            setTimeout(type, speed);
        }

        type(); // start typing when the page loads
    })();
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var navbar = document.getElementById("navbar");

        window.addEventListener("scroll", function() {
            if (window.scrollY > 0) {
                navbar.style.backgroundColor =
                    "#212529"; // Change background color when scrolling down
            } else {
                navbar.style.backgroundColor =
                    "transparent"; // Change background color when scrolling back to the top
            }
        });
    });
</script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) { // if input is file, files has content
            var inputFileData = input.files[0]; // shortcut
            var reader = new FileReader(); // FileReader() : init
            reader.onload = function(e) {
                /* FileReader : set up ************** */
                console.log('e', e)
                $('.file-upload-placeholder').hide(); // call for action element : hide
                $('.file-upload-image').attr('src', e.target.result); // image element : set src data.
                $('.file-upload-preview').show(); // image element's container : show
                $('.image-title').html(inputFileData.name); // set image's title
            };
            console.log('input.files[0]', input.files[0])
            reader.readAsDataURL(inputFileData); // reads target inputFileData, launch `.onload` actions
        } else {
            removeUpload();
        }
    }

    function removeUpload() {
        var $clone = $('.file-upload-input').val('').clone(true); // create empty clone
        $('.file-upload-input').replaceWith($clone); // reset input: replaced by empty clone
        $('.file-upload-placeholder').show(); // show placeholder
        $('.file-upload-preview').hide(); // hide preview
    }

    // Style when drag-over
    $('.file-upload-placeholder').bind('dragover', function() {
        $('.file-upload-placeholder').addClass('image-dropping');
    });
    $('.file-upload-placeholder').bind('dragleave', function() {
        $('.file-upload-placeholder').removeClass('image-dropping');
    });
</script>