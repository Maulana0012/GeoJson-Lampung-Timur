<style>
* {
    box-sizing: border-box;
}

body {
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
}

.header {
    overflow: hidden;
    background-color: #0d6efd;
    padding: 5px 5px;
}

.header a {
    float: left;
    color: white;
    text-align: center;
    padding: 12px;
    text-decoration: none;
    font-size: 16px;
    line-height: 25px;
    border-radius: 4px;

}

.header a.logo {
    font-size: 25px;
    font-weight: bold;
    float: inline-end;
}

.header a:hover {
    background-color: dodgerblue;
    color: white;
}

.header a.active {
    background-color: dodgerblue;
    color: white;
}

.header-right {
    float: left;
}

@media screen and (max-width: 500px) {
    .header a {
        float: none;
        display: block;
        text-align: left;
    }

    .header-right {
        float: none;
    }
}
</style>
</script>
<div class="header">
    <a href="#default" class="logo">WELCOME</a>
    <div class="header-right">
        <a href="?page=index-main">Home</a>
        <a href="#contact">Contact</a>
        <a href="#about">About</a>
    </div>
</div>