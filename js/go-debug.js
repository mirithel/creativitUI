function create_diagram() {
    var $ = go.GraphObject.make;
    var myDiagram =
      $(go.Diagram, "association_cluster",
        { // enable Ctrl-Z to undo and Ctrl-Y to redo
          "undoManager.isEnabled": true
        });


    // define a simple Node template
    var associationword =
      $(go.Node, "Auto",

        $(go.Shape, "Ellipse",
          { width: 100, height: 60, margin: 1, fill: 'hsl(204, 86%, 53%)' }),

        $(go.TextBlock,
          "Default Text",  // the initial value for TextBlock.text
          // some room around the text, a larger font, and a white stroke:
          { width:100, height: 60, margin: 0, stroke: "white", font: "bold 16px sans-serif", textAlign: "center", alignment: go.Spot.Center, verticalAlignment: go.Spot.Center },
          // TextBlock.text is data bound to the "name" property of the model data
          new go.Binding("text", "name"))
      );

      var keyword =
        $(go.Node, "Auto",
        {
        location: new go.Point(100, 0),  // set the Node.location
        locationObjectName: "SHAPE",  // the location point is at the center of "SHAPE"
        locationSpot: go.Spot.Center
        },
          $(go.Shape, "Ellipse",
            { width: 100, height: 60, margin: 1, fill: '#148EFF' }),

          $(go.TextBlock,
            "Default Text",  // the initial value for TextBlock.text
            // some room around the text, a larger font, and a white stroke:
            { width:100, height: 60, margin: 0, stroke: "white", font: "bold 16px sans-serif", textAlign: "center", alignment: go.Spot.Center, verticalAlignment: go.Spot.Center },
            // TextBlock.text is data bound to the "name" property of the model data
            new go.Binding("text", "name"))
        );

      // create the nodeTemplateMap, holding three node templates:
      var templmap = new go.Map(); // In TypeScript you could write: new go.Map<string, go.Node>();
      // for each of the node categories, specify which template to use
      templmap.add("key", keyword);
      templmap.add("association", associationword);
      // for the default category, "", use the same template that Diagrams use by default;
      // this just shows the key value as a simple TextBlock
      templmap.add("", diagram.nodeTemplate);

      diagram.nodeTemplateMap = templmap;


    // for each object in this Array, the Diagram creates a Node to represent it
    //diagram.model.nodeDataArray
      var nodeDataArray   = [
      { key:"1", name: "Alpha", category: "key"},
      { key:"3", parent:"1", name: "Beta",  category: "association" },
      { key:"3", parent:"1", name: "Gamma", category: "association" },
      { key:"4", parent:"1", name: "Gamma", category: "association" },
      { key:"5", parent:"1", name: "Gamma", category: "association" }
    ];
     diagram.model = new go.TreeModel(nodeDataArray);
 }
