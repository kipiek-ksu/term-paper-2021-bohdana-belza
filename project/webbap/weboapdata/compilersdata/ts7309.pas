program z1;
var x1,x2,y1,y2:real;
begin
read(x1,y1,x2,y2);
if((x1<=x2)and (abs(y1)>=abs(y2))) or ((x1<=x2)and(abs(y1)<=abs(y2))) then write('OA')
ELSE WRITE('OB');
END.