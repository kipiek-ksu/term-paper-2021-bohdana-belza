Program L28;
type mas=array [1..100] of integer;
var ch1,ch2,ch3,max:string;
a,b,k : mas;
n,m,c,r,s1,s2,s3:integer;
Procedure zapovn(var n:integer;var a:mas);
var i : integer;
begin
for i:=1 to n do
read(a[i]);
end;
Procedure suma(n:integer;a:mas;var s:integer);
var i:integer;
begin
S:=0;
for i:=1 to n do
S:=S+a[i];
end;
begin
read(n,m,c);
ch1:='gnoms';
ch2:='enimals';
ch3:='birds';
zapovn(n,a);
max:=0;
if(max<a[i]) then
begin
max:=a[i];
a[i]:=a[i+1];
end;
else
a[i]:=a[i+1];
suma(n,a,s1);
zapovn(m,b);
max:=0;
if(max<a[i]) then
begin
max:=a[i];
a[i]:=a[i+1];
end;
else
a[i]:=a[i+1];
suma(m,b,s2);
zapovn(c,k);
max:=0;
if(max<a[i]) then
begin
max:=a[i];
a[i]:=a[i+1];
end;
else
a[i]:=a[i+1];
suma(c,k,S3);
if (s1>s2)and(s1>s3)then max:=ch1 else
if (s2>s1)and(s2>s3) then max:=ch2 else
if (s3>s1)and(s3>s2) then max:=ch3;
write(max);
end.
