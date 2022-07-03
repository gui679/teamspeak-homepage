
const resizeObserver = new ResizeObserver(entries => 
    { 
        if(document.body.scrollHeight > document.body.clientHeight){
            document.querySelector('footer').style = "position:relative";            
        } else {
            document.querySelector('footer').style = "position:absolute";            
        }
    }
  )
  
  // start observing a DOM node
  resizeObserver.observe(document.body);
  resizeObserver.observe(document.getElementById('ts3viewer_1127191'));