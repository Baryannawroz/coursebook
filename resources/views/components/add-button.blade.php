<style>
    .button-container {
        display: flex;
        justify-content: center;
        margin-top: 2rem;
    }

    .button {
        display: flex;
        flex-direction: column;
        align-items: center;
      
        padding: 1rem;
        margin: 0 1rem;
        transition: border-color 0.3s ease;
        text-decoration: none;
        position: relative;
        width: 200px;
        border:2px solid #387ADF !important;
        border-radius: 0.5rem;
        color: rgb(59 130 246);
    }
  
    
    .button:hover {
        background-color: rgba(56, 122, 223, 0.1); /* Add background color on hover */
    }
    

    .icon {
        font-size: 1.5rem;
    }

    .text {
        margin-top: 0.5rem;
        font-weight: bold;
    }

    .selected {
      border:1px solid #387ADF;
    }


    .selected::before {
        content: '';
        position: absolute;
        top: 0.5rem;
        left: 0.5rem;
        width: 1rem;
        height: 1rem;
        background-color: #387ADF;
        border-radius: 50%;
    }

    
    .sel {
        border: 1px solid #387ADF;
    }

    .sel::before {
        content: '';
        position: absolute;
        top: 0.5rem;
        left: 0.5rem;
        width: 1rem;
        height: 1rem;
        border: 2px solid #387ADF;
        border-radius: 50%;
    }
</style>

<div class="button-container">
    <a href="{{ route('faculty.create') }}" class="button sel" id="faculty">
        <div class="icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="50px" height="50px" viewBox="0 0 1024 1024" class="icon" version="1.1"><path d="M511.3 191.8H94c-16.4 0-29.8 13.3-29.8 29.7l-0.8 644.3c0 16.5 13.3 29.8 29.8 29.8h306.1l8.3 16.3c5.1 10 15.3 16.3 26.6 16.3h156c10.9 0 20.9-6 26.2-15.5l9.3-17h304c16.4 0 29.8-13.3 29.8-29.8V221.6c0-16.4-13.3-29.8-29.8-29.8H511.3z" fill="#387ADF"/><path d="M517.8 189.4c-5.3 3.6-12.1 4.3-18 1.7-32.7-14.4-143.8-59.4-248.8-59.4H144.5c-10.2 0-18.5 8.3-18.5 18.5v666.6c0 10.2 8.3 18.5 18.5 18.5h328.3c5.4 0 10.5 2.3 14 6.4l8.8 10.1c7.3 8.4 20.3 8.5 27.7 0.3l9.8-10.7c3.5-3.9 8.5-6.1 13.7-6.1h328.8c10.2 0 18.5-8.3 18.5-18.5l0.9-666.6c0-10.3-8.3-18.6-18.5-18.6H764.2c0 0.1-155.6-4.1-246.4 57.8z" fill="#FFFFFF"/><path d="M511 894.1l-31.3-36c-3.5-4.1-8.6-6.4-14-6.4H126.6c-10.2 0-18.5-8.3-18.5-18.5V126.6c0-10.2 8.3-18.5 18.5-18.5H253c100.6 0 204.6 39 247.2 56.9 5.6 2.3 11.9 1.8 17-1.3 94.5-58.4 239.7-55.8 249.4-55.6h132.1c10.3 0 18.6 8.3 18.5 18.6l-1 706.6c0 10.2-8.3 18.5-18.5 18.5h-340c-5.2 0-10.2 2.2-13.7 6.1l-33 36.2z m-363-82.4h336c5.4 0 10.5 2.3 14 6.4 7.3 8.4 20.3 8.5 27.7 0.3l0.6-0.6c3.5-3.9 8.5-6.1 13.7-6.1h336.2l0.9-663.7H765.7c-1.6 0-159.7-3.5-242.2 59.7l-0.7 0.5c-5.5 4.2-13 5-19.3 2l-0.8-0.4C501 209 371.5 148 252.9 148H148v663.7z" fill="#387ADF"/><path d="M511.3 200.1v667.5" fill="#FFFFFF"/><path d="M491.3 200.1h40v667.5h-40z" fill="#387ADF"/><path d="M576 291.6h256v40H576zM576 443.1h256v40H576zM576 611.5h256v40H576zM191 291.5h256v40H191zM191 443.1h256v40H191zM191 611.5h256v40H191z" fill="#387ADF"/></svg>
        </div>
        <div class="text">Add Faculty</div>
    </a>
    <a href="{{ route('department.create') }}" class="button sel" id="department">
        <div class="icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="50px" height="50px" viewBox="0 0 48 48" version="1" enable-background="new 0 0 48 48">
    <polygon fill="#C5CAE9" points="42,42 6,42 6,9 24,2 42,9"/>
    <rect x="6" y="42" fill="#9FA8DA" width="36" height="2"/>
    <rect x="20" y="35" fill="#387ADF" width="8" height="9"/>
    <g fill="#387ADF">
        <rect x="31" y="27" width="6" height="5"/>
        <rect x="21" y="27" width="6" height="5"/>
        <rect x="11" y="27" width="6" height="5"/>
        <rect x="31" y="35" width="6" height="5"/>
        <rect x="11" y="35" width="6" height="5"/>
        <rect x="31" y="19" width="6" height="5"/>
        <rect x="21" y="19" width="6" height="5"/>
        <rect x="11" y="19" width="6" height="5"/>
        <rect x="31" y="11" width="6" height="5"/>
        <rect x="21" y="11" width="6" height="5"/>
        <rect x="11" y="11" width="6" height="5"/>
    </g>
</svg>  

        </div>
        <div class="text">Add Department</div>
    </a>
    <a href="{{ route('stage.create') }}" class="button sel" id="stage">
        <div class="icon">
        
<svg xmlns="http://www.w3.org/2000/svg" width="50px" height="50px" viewBox="0 0 32 32" fill="none">
<path d="M23.3 8.40007L21.82 6.40008C21.7248 6.27314 21.6009 6.17066 21.4583 6.10111C21.3157 6.03156 21.1586 5.99693 21 6.00008H11.2C11.0556 6.00007 10.9128 6.03135 10.7816 6.09177C10.6504 6.15219 10.5339 6.24031 10.44 6.35007L8.72 8.35008C8.57229 8.53401 8.49437 8.76424 8.5 9.00008V16.2901C8.50264 18.0317 9.19568 19.7013 10.4272 20.9328C11.6588 22.1644 13.3283 22.8574 15.07 22.8601H16.93C18.6717 22.8574 20.3412 22.1644 21.5728 20.9328C22.8043 19.7013 23.4974 18.0317 23.5 16.2901V9.00008C23.5 8.7837 23.4298 8.57317 23.3 8.40007Z" fill="#FFCC80"/>
<path d="M29.78 28.38L25.78 23.38C25.664 23.2321 25.5087 23.1198 25.3318 23.0562C25.1549 22.9925 24.9637 22.98 24.78 23.02L16 25L7.22 23C7.03633 22.96 6.84509 22.9725 6.66822 23.0362C6.49134 23.0998 6.336 23.2121 6.22 23.36L2.22 28.36C2.10393 28.5064 2.03117 28.6823 2.00996 28.8679C1.98875 29.0534 2.01994 29.2413 2.1 29.41C2.17816 29.5839 2.30441 29.7319 2.46387 29.8364C2.62333 29.9409 2.80935 29.9977 3 30H29C29.1885 29.9995 29.373 29.9457 29.5322 29.8448C29.6915 29.744 29.819 29.6002 29.9 29.43C29.9801 29.2613 30.0112 29.0734 29.99 28.8879C29.9688 28.7023 29.8961 28.5264 29.78 28.38Z" fill="#387ADF"/>
<path d="M29.29 6.00003L16.29 2.00003C16.0999 1.95002 15.9001 1.95002 15.71 2.00003L2.71 6.00003C2.49742 6.06422 2.31226 6.19735 2.1837 6.37841C2.05515 6.55947 1.99052 6.77817 2 7.00003C1.9917 7.22447 2.0592 7.44518 2.19163 7.62659C2.32405 7.80799 2.5137 7.93954 2.73 8.00003L15.73 11.6C15.906 11.6534 16.094 11.6534 16.27 11.6L29.27 8.00003C29.4863 7.93954 29.6759 7.80799 29.8084 7.62659C29.9408 7.44518 30.0083 7.22447 30 7.00003C30.0095 6.77817 29.9448 6.55947 29.8163 6.37841C29.6877 6.19735 29.5026 6.06422 29.29 6.00003Z" fill="#387ADF"/>
<path d="M11.22 6C11.0756 5.99999 10.9328 6.03127 10.8016 6.09169C10.6704 6.15211 10.5539 6.24023 10.46 6.35L8.74 8.35C8.58509 8.53114 8.49998 8.76166 8.5 9V16.29C8.50264 18.0317 9.19569 19.7012 10.4272 20.9328C11.6588 22.1643 13.3283 22.8574 15.07 22.86H16V6H11.22Z" fill="#FFE0B2"/>
<path d="M7.22 23C7.03633 22.96 6.84509 22.9725 6.66822 23.0362C6.49134 23.0998 6.336 23.2121 6.22 23.36L2.22 28.36C2.10393 28.5064 2.03117 28.6823 2.00996 28.8679C1.98875 29.0534 2.01994 29.2413 2.1 29.41C2.17816 29.5839 2.30441 29.7319 2.46387 29.8364C2.62333 29.9409 2.80935 29.9977 3 30H16V25L7.22 23Z" fill="#387ADF"/>
<path d="M15.71 2.00002L2.71 6.00002C2.49742 6.06422 2.31226 6.19734 2.1837 6.3784C2.05515 6.55947 1.99052 6.77817 2 7.00002C1.9917 7.22447 2.0592 7.44518 2.19163 7.62658C2.32405 7.80799 2.5137 7.93954 2.73 8.00002L15.73 11.6C15.8194 11.6146 15.9106 11.6146 16 11.6V2.00002C15.9039 1.98469 15.8061 1.98469 15.71 2.00002Z" fill="#387ADF"/>
</svg>
        </div>
        <div class="text">Add Stage</div>
    </a>
</div>

<script>
    const buttons = document.querySelectorAll('.button');

    buttons.forEach(button => {
        button.addEventListener('click', () => {
            buttons.forEach(btn => btn.classList.remove('selected'));
            button.classList.add('selected');
        });
    });
</script>
