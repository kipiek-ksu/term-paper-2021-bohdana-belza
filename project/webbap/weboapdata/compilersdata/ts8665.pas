program z1;
var a,b,c:longint;
f:boolean;
begin
readln(a,b);
f:=false;
while f=false do begin
if a> b then begin  a:=a+a; if a mod b=0 then begin f:=true; c:=a;
 end; end;  
else if a<b then begin  b:=b+b; if b mod a=0 then begin f:=true; c:=b;
end; end; 
else if a=b then c:=a;
end;
write(c);
end.