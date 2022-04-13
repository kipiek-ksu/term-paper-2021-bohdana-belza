program lab_4_94;
var x1,y1,x2,y2,x3,y3: integer;
begin
read (x1,y1,x2,y2,x3,y3);
if (sqrt(sqr(x2-x1)+sqr(y2-y1))=sqrt(sqr(x3-x2)+sqr(y3-y2))) and
   (sqrt(sqr(x2-x1)+sqr(y2-y1))=sqrt(sqr(x3-x1)+sqr(y3-y1))) then write ('yes')
   else write ('no');
   if (sqrt(sqr(x2-x1)+sqr(y2-y1))+sqrt(sqr(x3-x2)+sqr(y3-y2))<sqrt(sqr(x3-x1)+sqr(y3-y1)))
   then write ('error');
   end.