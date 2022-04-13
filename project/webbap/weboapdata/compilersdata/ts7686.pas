program L_4_61;
var x1,x2,y1,y2,x3,y3,ab1,ab2,bc1,bc2:integer;r,n,m:string;
begin
read (x1,y1,x2,y2,x3,y3);
n:='yes';
m:='no';
ab1:=x2-x1;
ab2:=y2-y1;
bc1:=x3-x2;
bc2:=y3-y2;
if ab1/bc1=ab2/bc2 then r:=n
                   else r:=m;
write (r);
end.
