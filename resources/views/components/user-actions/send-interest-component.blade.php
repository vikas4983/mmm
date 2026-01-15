{{-- <a id="sendInterest"  class="btn btn-default btn-block inResultSendMessageBtn">
    <i class="fas fa-bell gt-margin-right-5"></i>Send Interest
</a>

<script>
    document.getElementById("sendInterest").addEventListener("click", function(){
     e.preventDefault();
     let searchResultId = this.attribute("data-id");
     alert(searchResultId);
    });
</script> --}}

<!-- In send-interest-component.blade.php -->

    @foreach($searchResults as $searchResult)
        <p>User ID: {{ $searchResult->id }}</p>
        <!-- Access other user data -->
    @endforeach

