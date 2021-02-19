function load_associations() {

    // define keyword and edge arrays
    var association_keyword = localStorage.getItem('association_keyword');
    var keywordArray = [{id: 1, label: association_keyword}];
    var edgeArray= [];

    // get keywords from localstorage
    var storedNodes = JSON.parse(localStorage.getItem("nodes"));
    console.log(storedNodes);

    // fill arrays with nodes and edges
    storedNodes.forEach((element, count) => {
       keywordArray[count+1]= {id: count+2, label: element};
       edgeArray[count]= {from: 1, to: count+2};
     })
     console.log(keywordArray);

     // define datasets
    var nodes = new vis.DataSet(keywordArray);
    var edges = new vis.DataSet(edgeArray);

    // create a network
    var container = document.getElementById('mynetwork');
    var data = {
      nodes: nodes,
      edges: edges
    };
    var options = {
      nodes: {
        borderWidth: 20,
        borderWidthSelected: 20,
        font:"16px sans-serif white",
        color:{
          border: "#454679",
          background: "#454679",
          hover:"#454679",
        },
        shapeProperties: {
          interpolation: false    // 'true' for intensive zooming
        }
      },
      interaction: {
        dragNodes: false,
        dragView:false,
        zoomView:false,
        hover:true},
      layout: {improvedLayout:false}
    };
    var network = new vis.Network(container, data, options);

    network.on("hoverNode", function (params) {
        network.canvas.body.container.style.cursor = 'pointer'
    });

    network.on("blurNode", function (params) {
       network.canvas.body.container.style.cursor = 'default'
    });



    network.on( 'click', function(properties) {
    //console.log('clicked node ' + properties.nodes);
      var ids = properties.nodes;
      var clickedNodes = nodes.get(ids)[0]
      if(clickedNodes!=null){
        clickedNodes=clickedNodes.label;
        localStorage.setItem('association_keyword', clickedNodes);

        console.log('debug1');

        let url = window.location.href;

        if (url.search("q=")==-1) {
          //If parameter does not exist yet
          if (url.indexOf('?') > -1){
             url += '&'
          }else{
             url += '?'
          }
          url+='q='+clickedNodes;
        } else {
          url=url.replace(/q=[^&]*/g,"q="+clickedNodes);
        }

        window.location.href = url;
        }
      });
}
