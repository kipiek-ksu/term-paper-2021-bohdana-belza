program t10z6;
var str:string;
    r:string;
    i,n,m:integer;

begin
     writeln('Vvedite slovo');
     readln(str);

     r:='YES';

     n:=length(str);
     m:=(n div 2);
     for i:=1 to m do
       if str[i]<>str[n-i+1] then
        r:='NO';
     writeln(r);
     readkey;
end.