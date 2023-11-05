// {{-- Sweet Alert --}}
    $(function(){
        $(document).on('click', '#delete' , function(e){
            e.preventDefault();
            var link = $(this).attr("href");
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                'Deleted!',
                'Your Action has been deleted.',
                'success'
                )
            }
            })
        })
    })

    $(function(){
        $(document).on('click', '#confirmOrder' , function(e){
            e.preventDefault();
            var link = $(this).attr("href");
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to Make it Pending Again!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Confirm Order!'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                'Confirmed!',
                'Your Action has been Confirmed.',
                'success'
                )
            }
            })
        })
    })

    $(function(){
        $(document).on('click', '#processOrder' , function(e){
            e.preventDefault();
            var link = $(this).attr("href");
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to Make it Confirmed Again!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Process Order!'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                'Proccessing!',
                'Your Action has been processing.',
                'success'
                )
            }
            })
        })
    })

    $(function(){
        $(document).on('click', '#confirmOrder' , function(e){
            e.preventDefault();
            var link = $(this).attr("href");
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to Make it Pending Again!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Confirm Order!'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                'Confirmed!',
                'Your Action has been Confirmed.',
                'success'
                )
            }
            })
        })
    })

    $(function(){
        $(document).on('click', '#confirmOrder' , function(e){
            e.preventDefault();
            var link = $(this).attr("href");
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to Make it Pending Again!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Confirm Order!'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                'Confirmed!',
                'Your Action has been Confirmed.',
                'success'
                )
            }
            })
        })
    })

    $(function(){
        $(document).on('click', '#confirmOrder' , function(e){
            e.preventDefault();
            var link = $(this).attr("href");
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to Make it Pending Again!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Confirm Order!'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                'Confirmed!',
                'Your Action has been Confirmed.',
                'success'
                )
            }
            })
        })
    })
    $(function(){
        $(document).on('click', '#confirmOrder' , function(e){
            e.preventDefault();
            var link = $(this).attr("href");
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to Make it Pending Again!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Confirm Order!'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                'Confirmed!',
                'Your Action has been Confirmed.',
                'success'
                )
            }
            })
        })
    })

