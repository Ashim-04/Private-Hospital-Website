<script>
function searchH1() {
    var searchText = document.getElementById('searchBar').value.toLowerCase();
    var h1Tags = document.getElementsByTagName('h1');
    var found = false;

    for (var i = 0; i < h1Tags.length; i++) {
        if (h1Tags[i].textContent.toLowerCase() === searchText) {
            // Scroll to the first matched h1 element
            h1Tags[i].scrollIntoView();
            found = true;
            break; // Remove this line if you want to find all matches
        }
    }

    if (!found) {
        alert('No matching h1 tag found');
    }
}
</script>
