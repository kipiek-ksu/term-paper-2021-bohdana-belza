program p44;
var a,b,c,r:integer;
begin
read(a);
read(b);
read(c);
if(abs(a-b)=abs(b-c)) or (abs(a-c)=abs(c-b)) or (abs(b-a)=abs(a-c))
then begin write('yes');
if b<a then begin
r:=a;a:=b;b:=r;end;
if (c<a) then begin
r:=a;a:=c;c:=r;end;
if (c<b) then begin
r:=b;b:=c;c:=r;end;
write(a,b,c);end else begin write('no');
end;end.