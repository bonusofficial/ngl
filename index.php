<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>My Ngl by SuperBug</title>
</head>

<body>
    <main id="main">
        <div class="container">
            <div class="justify-content-center row">
                <div class="col-xxl-6">
                    <div class="text-center">
                        <h1 class="font-main">
                            Ngl ของข้าเองงง!!
                        </h1>
                    </div>
                    <div class="row justify-contect-center">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div>
                                        <div class="row">
                                            <div class="col-sm-1">
                                                <img class="profile"
                                                    src="https://media.discordapp.net/attachments/1064896559034142830/1135939465404235786/274130768_751049802966391_4242189626933914430_n.png?width=40&height=40"
                                                    alt="">
                                            </div>
                                            <div class="col">
                                                <p><a class="myig-text"
                                                        href="https://www.instagram.com/bon.usok/">@bon.usok</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <div>
                                            <textarea class="supermain-text" maxlength="300" id="msg"
                                                placeholder="ถามมาหน่อยเหงามากกกกกกกกกกกก........"></textarea>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <center><button class="btn btn-submit" id="send">ส่งให้เราเลย!</button></center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <center>
            <p class="">555 เราทำเองเพราะเหงา + ว่าง (เอาจิงนะเหงาเลยทำขึ้นมา อิอิ) Developer By โบนัส Bonus
                ใหญ่สุดในวงการ ไอจีเรา > <a href="https://www.instagram.com/bon.usok/"><i style="color: #fff;"
                        class="fa-brands fa-instagram"></i></a></p>
        </center>
    </footer>
    <script>
    const sendButton = document.getElementById('send');
    const msg = document.getElementById('msg');
    sendButton.addEventListener('click', function() {
        const message = msg.value;
        var formData = new FormData();
        formData.append('message', message);
        axios.post("./class/post.php", formData)
            .then(function(res) {
                console.log(res.data);
                if (res.data.status == true) {
                    Swal.fire({
                        icon: 'success',
                        title: 'เยี่ยม!!!',
                        text: res.data.message,
                    }).then(() => {
                        window.location.href = "https://www.instagram.com/bon.usok/";
                    })
                }
                if (res.data.status == false) {
                    Swal.fire({
                        icon: 'error',
                        title: 'มีอะไรผิดพลาดน้า???',
                        text: res.data.message,
                    }).then(() => {
                        window.location.reload();
                    })
                }
            })
            .catch(function(error) {
                console.error(error);
            });
    });
</script>
</body>

</html>