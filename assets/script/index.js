
const resizeObserver = new ResizeObserver(entries => 
    { 
        if(document.body.scrollHeight > document.body.clientHeight){
            document.querySelector('footer').style = "position:relative";            
        } else {
            document.querySelector('footer').style = "position:absolute";            
        }
        if(obj = document.querySelector("a[href='https://www.tsviewer.com/']"))
            obj.remove();
        if(obj = document.querySelector("a[href='https://play.google.com/store/apps/details?id=com.tsviewer.webapp']"))
            obj.remove();
    }
  )
  
  // start observing a DOM node
  resizeObserver.observe(document.body);
  resizeObserver.observe(document.getElementById('ts3viewer_1127191'));