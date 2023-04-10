$(document).ready(function() {
  textblock = $("pre code").html();
  var lines = textblock.split("\n");
  lines.splice(0, 1);
  var newtext = lines.join("\n");
  $("pre code").html(newtext);

  $("pre code").each(function(i, block) {
    hljs.highlightBlock(block);
  });
});