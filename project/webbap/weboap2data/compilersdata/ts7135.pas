program p2;
var x,y,r,a,b:real; l: string;
begin
l:='';
read(x,y,r,a,b);
if sqrt(sqr(a-x)+sqr(b-y))>r then l:='no'
                             else l:='yes';
write (l);
end.