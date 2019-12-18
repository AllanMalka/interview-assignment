$(document).ready(function () {

    const usersBox = $('#usersBox');

    const getAllUsers = () => {
        $.ajax({
            url: "View/getusers.php",
            success: d => {
                usersBox.html(d);
            }
        });
    }
    getAllUsers();

    $(document).on('click', '#btnDownload', function (e) {
        e.preventDefault();
        const filename = 'allusers.txt';
        //Writing the file.
        $.ajax({
            url: "Controller/writefile.php",
            data: {filename : filename},
            success: d => {
                if(d !== 'error'){
                    //Make the file creation async
                    let pr = new Promise((res,rej) => {
                        setTimeout(() => {
                            let blob = new Blob([d], { type: 'application/txt' });
                            let link = document.createElement('a');
                            link.href = window.URL.createObjectURL(blob);
                            link.download = filename;
        
                            document.body.appendChild(link);
        
                            link.click();
        
                            document.body.removeChild(link);
                            res(true);
                        }, 300);
                    });
                    //After file creation run delete users
                    pr.then(() => {
                        $.ajax({
                            url: "Controller/deleteuser.php",
                            success: d => {
                                if(d==='1'){
                                    //Then reshow the all users view
                                    usersBox.empty();
                                    getAllUsers();
                                }
                            }
                        });
                        alert('Download has finished.');
                    });
                } else {
                    alert('There was an error!');
                }
            }
        })
    });

    $(document).on('click', '#btnTestUsers', function (e) {
        e.preventDefault();
        $.ajax({
            url: "Controller/addtestusers.php",
            success: d => {
                if(d === '1') {
                    usersBox.empty();
                    getAllUsers();
                } else {
                    alert('Something went wrong');
                }
            }
        })
    });
});