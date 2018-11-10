let drawCode = "";
const bg = "images/index_scratch_bg.svg";

selectBG = bg;

$("#draw").wScratchPad({
  // the size of the eraser
  size: 50,
  // the randomized scratch images
  bg: selectBG,
  // give real-time updates
  realtime: true,
  // The overlay images
  fg: "images/index_scratch_cover.svg",
  // The cursor (coin) images
  cursor: 'url("../images/index_coinCursor.png") 5 5, default'
});
