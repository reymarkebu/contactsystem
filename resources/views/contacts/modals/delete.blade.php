<div class="modal fade" id="deleteContact" tabindex="-1" role="dialog" aria-labelledby="deleteContactTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <form action="{{route('contacts.destroy', $contact->id)}}" method="post" id="submitForm">
            <input type="hidden" name="_method" value="delete">
            @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteContactTitle">Delete Contact</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container text-center">
                        <h2>Are you sure you want to Delete?</h2>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark" onclick="myFunction()">Delete</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function myFunction() {
        
        document.getElementById("submitForm").submit();
    }
</script>