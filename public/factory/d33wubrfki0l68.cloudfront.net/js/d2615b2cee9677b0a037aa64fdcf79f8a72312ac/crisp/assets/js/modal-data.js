(function($){"use strict";$(document).on("click","[data-modal-position]",function(e){e.preventDefault();$("#positionModal").removeAttr("class");$("#positionModal").addClass("modal fade "+$(this).attr("data-modal-position"));$("#positionModal").modal("show")})})(window.jQuery);
