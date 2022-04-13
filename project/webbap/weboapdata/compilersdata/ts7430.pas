Program pr14;
var m,n: longint; d1,d2: real;
begin
read(m,n);
d1:=sqrt(2*(m*n+sqr(n)));
d2:=2*sqrt(sqr(m+n)-sqr(d1)/4);
write(d1:2:2, ' ', d2:2:2);
end.