function insertAlert(buttonId, formId) {
    document.getElementById(buttonId).addEventListener('click', function (e) {
        e.preventDefault();

        Swal.fire({
            title: "Do you want to save the changes?",
            showCancelButton: true,
            confirmButtonColor: "#38a095",
            cancelButtonColor: "#df856f",
            confirmButtonText: "Yes",
            cancelButtonText: "No"
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Form Submitted!',
                    text: 'Your form has been submitted successfully.',
                    icon: 'success',
                    confirmButtonColor: "#38a095",
                    confirmButtonText: 'OK'
                }).then((result) => {
                    document.getElementById(formId).requestSubmit();
                });
            }; 
        });    
    });
}

function updateAlert(buttonId, formId) {
    document.getElementById(buttonId).addEventListener('click', function (e) {
        e.preventDefault();

        Swal.fire({
            title: "Do you want to save the changes?",
            showCancelButton: true,
            confirmButtonColor: "#38a095",
            cancelButtonColor: "#df856f",
            confirmButtonText: "Yes",
            cancelButtonText: "No"
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Entry Updated!',
                    text: 'Your entry has been updated successfully.',
                    icon: 'success',
                    confirmButtonColor: "#38a095",
                    confirmButtonText: 'OK'
                }).then((result) => {
                    document.getElementById(formId).requestSubmit();
                });
            }; 
        });    
    });
}

// function deleteAlert(buttonId, formId) {
//     document.getElementById(buttonId).addEventListener('click', function (e) {
//         e.preventDefault();
//         Swal.fire({
//             title: "Are you sure?",
//             text: "You won't be able to revert this!",
//             icon: "warning",
//             showCancelButton: true,
//             confirmButtonColor: "#38a095",
//             cancelButtonColor: "#df856f",
//             confirmButtonText: "Yes, delete it!"
//         }).then((result) => {
//             if (result.isConfirmed) {
//                 Swal.fire({
//                     title: "Deleted!",
//                     text: "Your file has been deleted.",
//                     icon: "success",
//                     confirmButtonColor: "#38a095"
//                 }).then((result) => {
//                     document.getElementById(formId).requestSubmit();
//                 });
//             }
//         });   
//     });
// }

function msgAlert(msg, msgIcon/*, location*/) {
    Swal.fire({
        title: msg,
        icon: msgIcon,
        confirmButtonColor: "#38a095"
    // }).then((result) => {
    //     if (result.isConfirmed) {
    //         window.location.replace(location);
    //     }
    }); 
}
