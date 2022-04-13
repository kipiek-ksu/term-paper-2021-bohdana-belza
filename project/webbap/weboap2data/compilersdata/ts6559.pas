const c=30;

var fname:string;
    fail:text;
    sa:real;
    n,s,l,code:integer;
    mem:string;


begin
clrscr;
    writeln('Vvedite adres faila s chislami');
    readln(fname);

    Assign(fail,fname);

    ReSet(fail);

    s:=0;
    n:=0;
    mem:='';
    while (not eof(fail)) do
    begin
    readln(fail,mem);
    val(mem,l,code);
    if code=0 then
     begin
         if ((l mod 2)=1) and((l mod 3)=0) then
          s:=s+1;
     end;
    end;

    writeln(s);

    close(fail);

    readkey;
end.