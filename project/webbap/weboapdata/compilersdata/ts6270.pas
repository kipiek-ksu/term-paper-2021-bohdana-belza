program t7z6_2;
var   n:integer;
      s,buf:string;
      m:integer;
    a:array[1..100] of integer;
    i:integer;

begin
    writeln('Vvedite naturalnoe 4islo n');
    readln(n);

    m:=sqr(n);
    i:=1;
    buf:='NO';

    repeat
         a[i]:=(m mod 10);
         m:=(m div 10);
         if a[i]=3 then
          buf:='YES'
         else
            s:='NO';
         i:=i+1;
    until (m)=0;

    s:=buf;

    writeln(s);
    readkey;
end.