
const resizeObserver = new ResizeObserver(entries => 
    { 
        if(document.body.scrollHeight > document.body.clientHeight){
            document.querySelector('footer').style = "position:relative";            
        } else {
            document.querySelector('footer').style = "position:absolute";            
        }
        document.querySelector("a[href='https://www.tsviewer.com/']").remove();
        document.querySelector("a[href='https://play.google.com/store/apps/details?id=com.tsviewer.webapp']").remove();
    }
  )
  
  // start observing a DOM node
  resizeObserver.observe(document.body);
  resizeObserver.observe(document.getElementById('ts3viewer_1127191'));

  document.querySelector("a[href='https://www.tsviewer.com/']").remove();