//var require = function(path)

exports.distance = (i, j) => {
    return Math.abs( Math.abs(i) - Math.abs(j) )
  }
  
exports.getData = (pose) => {
    function getAngle(x1,y1,x2,y2){
        var rad = Math.atan2(y2-y1,x2-x1);
        return(rad*180)/Math.PI;
    }
    for(let i of pose.keypoints){
      if(i.score < 0.499){
        i.position.x, i.position.y = 0;
      }
    }
    //  console.log(getAngle(pose.keypoints[5].position.x, pose.keypoints[5].position.y, pose.keypoints[6].position.x, pose.keypoints[6].position.y));
    back = {}
    // 어깨  
    back.shoulder = getAngle(pose.keypoints[5].position.x, pose.keypoints[5].position.y, pose.keypoints[6].position.x, pose.keypoints[6].position.y);
    // 안쪽 왼팔
    back.leftUpperarm = getAngle(pose.keypoints[5].position.x, pose.keypoints[5].position.y, pose.keypoints[7].position.x, pose.keypoints[7].position.y);
    // 바깥쪽 왼팔
    back.leftForearm = getAngle(pose.keypoints[7].position.x, pose.keypoints[7].position.y, pose.keypoints[9].position.x, pose.keypoints[9].position.y);
    // 안쪽 오른팔
    back.rightUpperarm = getAngle(pose.keypoints[6].position.x, pose.keypoints[6].position.y, pose.keypoints[8].position.x, pose.keypoints[8].position.y);
    // 바깥쪽 오른팔
    back.rightForearm = getAngle(pose.keypoints[8].position.x, pose.keypoints[8].position.y, pose.keypoints[10].position.x, pose.keypoints[10].position.y);
    // 왼쪽 몸뚱아리
    back.leftTrunk = getAngle(pose.keypoints[5].position.x, pose.keypoints[5].position.y, pose.keypoints[11].position.x, pose.keypoints[11].position.y);
    // 오른쪽 몸뚱아리
    back.rightTrunk = getAngle(pose.keypoints[6].position.x, pose.keypoints[6].position.y, pose.keypoints[12].position.x, pose.keypoints[12].position.y);
    // 엉덩이
    back.hip = getAngle(pose.keypoints[11].position.x, pose.keypoints[11].position.y, pose.keypoints[12].position.x, pose.keypoints[12].position.y);
    // 왼쪽 허벅지
    back.leftThigh = getAngle(pose.keypoints[11].position.x, pose.keypoints[11].position.y, pose.keypoints[13].position.x, pose.keypoints[13].position.y);
    // 왼쪽 종아리
    back.leftShin = getAngle(pose.keypoints[13].position.x, pose.keypoints[13].position.y, pose.keypoints[15].position.x, pose.keypoints[15].position.y);
    // 오른쪽 허벅지
    back.rightThigh = getAngle(pose.keypoints[12].position.x, pose.keypoints[12].position.y, pose.keypoints[14].position.x, pose.keypoints[14].position.y);
    // 오른쪽 종아리 
    back.rightShin = getAngle(pose.keypoints[14].position.x, pose.keypoints[14].position.y, pose.keypoints[16].position.x, pose.keypoints[16].position.y);
  
    return back;
  }

  