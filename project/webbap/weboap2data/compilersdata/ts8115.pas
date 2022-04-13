Program l_10_150;
const nmax=50;
type mnz=set of 0..nmax;
var a,b:mnz;
    n,z,d,i:0..nmax;
    l:word;
begin
randomize;
repeat
read(n);
until n in [1..nmax+1];
a:=[];
for i:=1 to n do
 begin
  repeat
   d:=random(51);
  until not(d in a);
  a:=a+[d];
 end;
repeat
read(z);
until z in [1..nmax+1];
b:=[];
for i:=1 to z do
 begin
  repeat
   d:=random(nmax+1);
  until not(d in b);
  b:=b+[d];
 end;
writeln('Множество А:');
for d:=0 to nmax do
if d in a then write(d,' ');
writeln;
writeln;
writeln('Множество B:');
for d:=0 to nmax do
if d in b then write(d,' ');
writeln;
writeln;
i:=0;
l:=0;
writeln('Элементы, принадлежащие обоим множествам:');
for d:=0 to nmax do
if(d in a)and(d in b) then
 begin
  write(d,' ');
  i:=i+1;
  l:=l+d;
 end;
writeln;
if i=0 then write('Таких элементов нет!')
else write('Их количество=',i,'  сумма=',l);
readln;
end.